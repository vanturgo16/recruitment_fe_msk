<div class="row g-4">
    @forelse($jobLists as $item)
        <div class="col-12">
            <div class="career-card p-4 transition">
                <h4 class="fw-bold mb-2">{{ $item->position_name }}</h4>
                <p class="text-muted mb-3">{{ $item->dept_name }}</p>
                <hr>
                <div class="career-requirements row mb-3">
                    <div class="career-degree col-md-6">
                        <div class="d-flex">
                            <i class="career-icon bi bi-calendar-check me-2 align-self-start"></i>
                            <div>
                                <div class="fw-bold">Periode Pendaftaran</div>
                                <div>
                                    {{ \Carbon\Carbon::parse($item->rec_date_start)->translatedFormat('d M Y') }}
                                    @if ($item->rec_date_end)
                                        - {{ \Carbon\Carbon::parse($item->rec_date_end)->translatedFormat('d M Y') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="career-degree col-md-6">
                        <div class="d-flex">
                            <i class="career-icon bi bi-mortarboard-fill me-2 align-self-start"></i>
                            <div>
                                <div class="fw-bold">Pendidikan</div>
                                <div>{{ $item->min_education ?? '-' }}</div>
                            </div>
                        </div>                            
                    </div>
                    <div class="career-degree col-md-6">
                        <div class="d-flex">
                            <i class="career-icon bi bi-briefcase-fill me-2 align-self-start"></i>
                            <div>
                                <div class="fw-bold">Pengalaman di Bidang yang Sama</div>
                                <div>
                                    @if (!is_null($item->min_yoe))
                                        > {{ $item->min_yoe }} tahun
                                    @else
                                        -
                                    @endif
                                </div>                                        
                            </div>
                        </div>
                    </div>
                    <div class="career-degree col-md-6">
                        <div class="d-flex">
                            <i class="career-icon bi bi-person-fill me-2 align-self-start"></i>
                            <div>
                                <div class="fw-bold">Umur</div>
                                <div>
                                    @if (!is_null($item->min_age))
                                        > {{ $item->min_age }} tahun
                                    @else
                                        -
                                    @endif
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="career-description text-muted mb-3">
                    {!! $item->jobdesc !!}
                </div>
                <hr>
                <div class="career-tags d-flex gap-2 flex-wrap">
                    <a href="{{ route('job.detail', encrypt($item->id)) }}" class="btn btn-small btn-info text-white">
                        <span class="badge bg-light text-dark"><i class="bi bi-eye"></i></span>
                        Detail Lowongan
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info" role="alert">
                Tidak ada lowongan pekerjaan yang ditemukan.
            </div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="row mt-4" id="pagination">
    <div class="col-12 text-center">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center custom-pagination">
                @if ($jobLists->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Sebelumnya</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $jobLists->previousPageUrl() }}" rel="prev">Sebelumnya</a>
                    </li>
                @endif

                @foreach ($jobLists->getUrlRange(1, $jobLists->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $jobLists->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($jobLists->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $jobLists->nextPageUrl() }}" rel="next">Selanjutnya</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Selanjutnya</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>

<!-- AJAX for Search and Pagination -->
<script>
	$(document).ready(function() {
		// Handle Search Submit
		$('#search-form').on('submit', function(e) {
			e.preventDefault();
			var url = $(this).attr('action');
			var query = $(this).serialize();
			fetchJobs(url + '?' + query);
		});
		// Handle Pagination Click
		$(document).on('click', '.pagination a', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			fetchJobs(url);
		});
		function fetchJobs(url) {
			$.ajax({
				url: url,
				type: 'GET',
				beforeSend: function() {
					$('#joblist-container').html('<div class="text-center my-5"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div></div>');
				},
				success: function(data) {
					$('#joblist-container').html(data);
				},
				error: function() {
					alert('Gagal memuat data.');
				}
			});
		}
	});
</script>