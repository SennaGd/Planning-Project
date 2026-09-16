<x-SchipholLayout>
    <div class="flex w-full items-center px-6 py-3 dark:bg-schiphol-dark_gray transition-colors duration-200" id="filterbar">
        <thead class="dark:bg-schiphol-dark_gray bg-gray-300 transition-colors duration-200">
            <div class='w-full '>
                @if ($qr_code)
                    <div class="dark:bg-schiphol-dark_gray qr-container w-full ">
                        <h3 class='text-xl font-semibold mb-5'>Scan to Subscribe to Calendar</h3>
                        <img src="{{ $qr_code }}" alt="Calendar QR Code">
                        <p class=' mt-10 pb-10 color-blue' ><a class='subscribe-link' href="{{ $httpsUrl }}">Subscribe directly on this device</a></p>
                    </div>
                @else
                    <p>QR Code was not requested.</p>
                @endif
            </div>
        </thead>
</x-SchipholLayout>
<style>
.qr-container {
    display: flex;
    align-items:center;
    width: 100%;
    flex-direction: column;
}
.subscribe-link {
    text-decoration: underline;
    margin-bottom: 5rem;
}


.subscribe-link:hover {
    color: gray;
}
.qr-container img {
    margin:auto;
    max-width: 600px
}
</style>
