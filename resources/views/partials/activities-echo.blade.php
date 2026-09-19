<script src="https://cdn.jsdelivr.net/npm/pusher-js@8.6.0/dist/web/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@2.5.0/dist/echo.iife.js"></script>
<script>
    window.Echo = new Echo.default({
        broadcaster: 'pusher',
        key: @js(config('broadcasting.connections.pusher.key')),
        cluster: @js(config('broadcasting.connections.pusher.options.cluster')),
        forceTLS: @js(config('broadcasting.connections.pusher.options.encrypted')),
    });

    const activitiesBody = document.getElementById('activities-body');
    const selectedDate = @js($selectedDate);

    function formatTime(iso) {
        return new Date(iso).toLocaleTimeString('nl-NL', { hour: '2-digit', minute: '2-digit' });
    }

    function formatDate(iso) {
        return new Date(iso).toLocaleDateString('nl-NL');
    }

    function statusCell(startIso, endIso) {
        const now = Date.now();
        const paragraph = document.createElement('p');

        if (new Date(endIso).getTime() < now) {
            paragraph.className = 'text-red-500';
            paragraph.textContent = 'Vertrokken';
        } else if (new Date(startIso).getTime() < now) {
            paragraph.className = 'text-green-500';
            paragraph.textContent = 'Boarding';
        } else {
            paragraph.className = 'text-yellow-500';
            paragraph.textContent = 'Gepland';
        }

        return paragraph;
    }

    function refreshActivityStatus(row) {
        const startIso = row.dataset.dtStart;
        const endIso = row.dataset.dtEnd;
        const status = row.querySelector('[data-cell="status"]');

        if (! startIso || ! endIso || ! status) {
            return;
        }

        status.replaceChildren(statusCell(startIso, endIso));
    }

    function refreshAllActivityStatuses() {
        activitiesBody.querySelectorAll('[data-activity-id]').forEach(refreshActivityStatus);
    }

    function appendActivityRow(activity) {
        const row = document.createElement('tr');
        row.className = 'text-1xl';
        row.dataset.activityId = activity.id;
        row.dataset.dtStart = activity.dt_start;
        row.dataset.dtEnd = activity.dt_end;

        const cells = [
            `${formatTime(activity.dt_start)} - ${formatTime(activity.dt_end)}`,
            formatDate(activity.dt_start),
            activity.summary ?? '',
            activity.location ?? '',
            activity.classnames ?? '',
            activity.attendee ?? '',
        ];

        cells.forEach((value, index) => {
            const cell = document.createElement('td');
            cell.className = 'px-4 py-2';
            cell.textContent = value;

            if (index === 4) {
                cell.dataset.cell = 'classnames';
            }

            row.appendChild(cell);
        });

        const status = document.createElement('td');
        status.className = 'px-4 py-2';
        status.dataset.cell = 'status';
        status.appendChild(statusCell(activity.dt_start, activity.dt_end));
        row.appendChild(status);

        activitiesBody.appendChild(row);
    }

    function upsertActivityRow(activity) {
        const existing = activitiesBody.querySelector(`[data-activity-id="${activity.id}"]`);

        if (existing) {
            const classnamesCell = existing.querySelector('[data-cell="classnames"]');

            if (classnamesCell) {
                classnamesCell.textContent = activity.classnames ?? '';
            }

            return;
        }

        appendActivityRow(activity);
    }

    function removeActivityRow(activity) {
        const existing = activitiesBody.querySelector(`[data-activity-id="${activity.id}"]`);

        existing?.remove();
    }

    function updateActivityRow(activity) {
        const existing = activitiesBody.querySelector(`[data-activity-id="${activity.id}"]`);

        if (! existing) {
            return;
        }

        existing.dataset.dtStart = activity.dt_start;
        existing.dataset.dtEnd = activity.dt_end;

        const cells = [
            `${formatTime(activity.dt_start)} - ${formatTime(activity.dt_end)}`,
            formatDate(activity.dt_start),
            activity.summary ?? '',
            activity.location ?? '',
            activity.classnames ?? '',
            activity.attendee ?? '',
        ];

        cells.forEach((value, index) => {
            const cell = existing.children[index];

            if (cell) {
                cell.textContent = value;

                if (index === 4) {
                    cell.dataset.cell = 'classnames';
                }
            }
        });

        refreshActivityStatus(existing);
    }

    window.Echo.channel('activities')
        .listen('.ActivityCreated', (activity) => {
            if (activity.date !== selectedDate) {
                return;
            }

            upsertActivityRow(activity);
        })
        .listen('.ActivityChanged', (activity) => {
            if (activity.date !== selectedDate) {
                return;
            }

            updateActivityRow(activity);
        })
        .listen('.ActivityDeleted', (activity) => {
            removeActivityRow(activity);
        });

    refreshAllActivityStatuses();
    setInterval(refreshAllActivityStatuses, 1000);
</script>
