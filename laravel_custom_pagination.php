<!-- YOU CAN CREATE A NEW BLADE FILE IN "\resources\views\vendor\pagination\custom.blade.php" -->
<!-- AND WRITE THIS CODE IN THAT FILE -->
<!-- YOU SHOULD CHANGE THE CLASS NAME IN ul, li, a TAG AS YOUR TEMPLATE -->
<!-- THEN YOU WILL GET YOUR CUSTOM PAGINATION STYLES -->

<!-- START -->
@if ($paginator->hasPages())
    <ul class="pagination justify-content-start pagination-xsm m-0">
       
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" aria-label="Page" rel="prev">
                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                    <span>Prev</span>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" aria-label="Page" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                    <span>Prev</span>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">
                    <span>{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled">
                            <a class="page-link" aria-label="Page">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" aria-label="Page" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" aria-label="Page" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span>Next</span>
                    <span aria-hidden="true" class="material-icons">chevron_right</span>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" aria-label="Page" rel="next">
                    <span>Next</span>
                    <span aria-hidden="true" class="material-icons">chevron_right</span>
                </a>
            </li>
        @endif
    </ul>
@endif 

<!-- END -->

<!-- AND IN THE BLADE FILE WHERE YOU WANT TO SHOW PAGINATION JUST ADD BELOW LINE -->
{{ $variable->links('vendor.pagination.custom') }}