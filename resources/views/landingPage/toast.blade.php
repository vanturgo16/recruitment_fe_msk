@if (session('success') || session('fail') || session('warning') || session('info') || count($errors)>0)
    <div class="toast-container p-3" style="position: fixed; bottom: 5vh; right: 25px; z-index: 9999;" data-bs-autohide="false">
        @if (session('success'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-success text-white d-flex justify-content-between align-items-center">
					<i class='bx bx-check-circle me-2' style="font-size: 20px;"></i>
					<strong class="me-auto text-white">Success</strong>
					<small class="text-white-50">Baru Saja</small>
					<button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					{{ session('success') }}
				</div>
			</div>
        @endif
        @if (session('fail'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-danger text-white d-flex justify-content-between align-items-center">
					<i class='bx bx-x-circle me-2' style="font-size: 20px;"></i>
					<strong class="me-auto text-white">Failed</strong>
					<small class="text-white-50">Baru Saja</small>
					<button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					{{ session('fail') }}
				</div>
			</div>
        @endif
        @if (session('warning'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-warning text-white d-flex justify-content-between align-items-center">
					<i class='bx bx-error-circle me-2' style="font-size: 20px;"></i>
					<strong class="me-auto text-white">Warning</strong>
					<small class="text-white-50">Baru Saja</small>
					<button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					{{ session('warning') }}
				</div>
			</div>
        @endif
        @if (session('info'))
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-info text-white d-flex justify-content-between align-items-center">
					<i class='bx bx-info-circle me-2' style="font-size: 20px;"></i>
					<strong class="me-auto text-white">Info</strong>
					<small class="text-white-50">Baru Saja</small>
					<button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
					{{ session('info') }}
				</div>
			</div>
        @endif
        <!--validasi form with $validate-->
        @if (count($errors)>0)
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-danger text-white d-flex justify-content-between align-items-center">
					<i class='bx bx-x-circle me-2' style="font-size: 20px;"></i>
					<strong class="me-auto text-white">Saved Data Failed!</strong>
					<small class="text-white-50">Baru Saja</small>
					<button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
				</div>
			</div>
        @endif
    </div>
@endif