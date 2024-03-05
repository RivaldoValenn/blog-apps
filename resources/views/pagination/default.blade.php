@if ($paginator->hasPages())
    <div class="flex justify-center items-center">
        <nav aria-label="Page navigation example flex justify-center">
            <ul class="inline-flex -space-x-px text-base h-10">
                <!-- Tombol sebelumnya -->
                <li>
                    @if ($paginator->onFirstPage())
                        <a href="javascript:void(0)" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white opacity-50">&#10094;</a>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">&#10094;</a>
                    @endif
                </li>

                <!-- Nomor halaman -->
                @if ($paginator->lastPage() <= 5)
                    <!-- Jika jumlah halaman kurang dari atau sama dengan 5 -->
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-{{ $i == $paginator->currentPage() ? '500' : '800' }} bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $i }}</a>
                        </li>
                    @endfor
                @elseif ($paginator->currentPage() <= 3)
                    <!-- Jika halaman saat ini di antara 1 dan 3 -->
                    @for ($i = 1; $i <= 4; $i++)
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-{{ $i == $paginator->currentPage() ? '500' : '800' }} bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $i }}</a>
                        </li>
                    @endfor
                    <li>
                        <span class="flex items-center justify-center px-4 h-10 text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                    </li>
                    <li>
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $paginator->lastPage() }}</a>
                    </li>
                @elseif ($paginator->currentPage() >= $paginator->lastPage() - 2)
                    <!-- Jika halaman saat ini di antara halaman terakhir dan terakhir - 2 -->
                    <li>
                        <a href="{{ $paginator->url(1) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <span class="flex items-center justify-center px-4 h-10 text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                    </li>
                    @for ($i = $paginator->lastPage() - 3; $i <= $paginator->lastPage(); $i++)
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-{{ $i == $paginator->currentPage() ? '500' : '800' }} bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $i }}</a>
                        </li>
                    @endfor
                @else
                    <!-- Jika halaman saat ini di antara 4 dan terakhir - 3 -->
                    <li>
                        <a href="{{ $paginator->url(1) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <span class="flex items-center justify-center px-4 h-10 text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                    </li>
                    @for ($i = $paginator->currentPage() - 1; $i <= $paginator->currentPage() + 1; $i++)
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-{{ $i == $paginator->currentPage() ? '500' : '800' }} bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $i }}</a>
                        </li>
                    @endfor
                    <li>
                        <span class="flex items-center justify-center px-4 h-10 text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                    </li>
                    <li>
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $paginator->lastPage() }}</a>
                    </li>
                @endif

                <!-- Tombol selanjutnya -->
                <li>
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-900 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">&#10095;</a>
                    @else
                        <a href="javascript:void(0)" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">&#10095;</a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
@endif