<?php 

namespace App\Events;

use App\Models\Activity;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Broadcasting\ShouldRescue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AcitivityChanged implements ShouldBroadcastNow, ShouldRescue 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Activity $activity)
    {
        if (! $this->activity->relationLoaded('schoolClasses')) {
            $this->activity->load('schoolClasses');
        }
    }

    /**
     * @return array<int, Channel>
     */
    public function broadcastWhen(): bool
    {
        $connection = config('broadcasting.default');

        if (! filled($connection) || $connection === 'null') {
            return false;
        }

        if ($connection !== 'reverb') {
            return true;
        }

        return filled(config('broadcasting.connections.reverb.key'))
            && filled(config('broadcasting.connections.reverb.options.host'));
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('activities'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'ActivityChanged';
    }

    /**
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->activity->id,
            'date' => $this->activity->dt_start->toDateString(),
            'dt_start' => $this->activity->dt_start->toIso8601String(),
            'dt_end' => $this->activity->dt_end->toIso8601String(),
            'summary' => $this->activity->summary,
            'location' => $this->activity->location,
            'attendee' => $this->activity->attendee,
            'classnames' => $this->activity->schoolClasses->pluck('classname')->join(', '),
        ];
    }
}