@foreach ($alertData[0]->alerts as $alert)
    @if (session()->has($alert->type))
        <div class="example-alert d-flex align-items-end justify-content-center bg-lighter mb-3 mt-3">
            <div class="alert alert-pro alert-{{ $alert->style }} alert-icon alert-dismissible">
                <em class="icon ni {{ $alert->icon }}"></em>
                <strong>{{ session($alert->type) }}</strong>
                <button class="close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
@endforeach
