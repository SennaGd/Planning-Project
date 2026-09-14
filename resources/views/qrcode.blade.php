<div>@if ($qr_code)
    <div class="qr-container">
        <h3>Scan to Subscribe to Calendar</h3>
        <img src="{{ $qr_code }}" alt="Calendar QR Code">
        {{ $httpsUrl }}
        <p><a href="{{ $httpsUrl}}">Subscribe directly on this device</a></p>
    </div>
@else
    <p>QR Code was not requested.</p>
@endif
</div>

<style>
.qr-container {
    max-width:200px;
}
</style>
