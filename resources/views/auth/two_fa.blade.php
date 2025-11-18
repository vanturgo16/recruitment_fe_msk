@extends('layouts.master')
@section('konten')

<section class="p-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 offset-xl-4 col-md-12 col-12">
				<div class="text-center">
					<h1 class="mb-1">Two-Factor Authentication</h1>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row justify-content-center mb-6">
			<div class="col-xl-5 col-lg-6 col-md-8 col-12 mb-4">
				<div class="card shadow-sm mb-3">
					<div class="card-body">
						<form class="formLoad" action="{{ route('verify.2fa.post') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<div class="mb-3">
										<label class="form-label">Authentication Code</label>
                                        <input type="text" name="two_fa_code" maxlength="6" class="form-control text-center" placeholder="Masukkan Kode 6-digit" required>
									</div>
								</div>
								
							</div>

							<div class="d-grid">
                                <button type="submit" class="btn btn-danger">Verify Code</button>
							</div>
						</form>

                        <div class="row">
                            <div class="col-lg-12 mb-3 mt-4 text-center">
                                <form action="{{ route('resend.2fa') }}" method="POST" id="resend-form" class="d-inline">
                                    @csrf
                                    <button type="submit" id="resend-btn" class="btn btn-outline-danger waves-effect" disabled>
                                        <i class="mdi mdi-refresh"></i> <span id="resend-text">Resend Code (10s)</span>
                                    </button>
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        let countdown = 10; // seconds
                                        const button = document.getElementById("resend-btn");
                                        const text = document.getElementById("resend-text");

                                        // Countdown timer
                                        const timer = setInterval(() => {
                                            countdown--;
                                            text.textContent = `Resend Code (${countdown}s)`;

                                            if (countdown <= 0) {
                                                clearInterval(timer);
                                                button.disabled = false;
                                                button.classList.remove('btn-outline-danger');
                                                button.classList.add('btn-danger');
                                                text.textContent = "Resend Code";
                                            }
                                        }, 1000);

                                        // On click: reset cooldown after resend
                                        document.getElementById('resend-form').addEventListener('submit', function () {
                                            button.disabled = true;
                                            button.classList.remove('btn-danger');
                                            button.classList.add('btn-outline-danger');
                                            countdown = 10;
                                            text.textContent = `Resend Code (${countdown}s)`;

                                            const newTimer = setInterval(() => {
                                                countdown--;
                                                text.textContent = `Resend Code (${countdown}s)`;

                                                if (countdown <= 0) {
                                                    clearInterval(newTimer);
                                                    button.disabled = false;
                                                    button.classList.remove('btn-outline-danger');
                                                    button.classList.add('btn-danger');
                                                    text.textContent = "Resend Code";
                                                }
                                            }, 1000);
                                        });
                                    });
                                </script>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection