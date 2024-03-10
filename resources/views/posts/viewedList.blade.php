<div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-5">
    <div class="card-body d-flex align-items-center p-4" style="color: #e15600;">
        <span class="material-symbols-outlined">visibility</span>
        <h4 class="fw-700 mb-0 font-xs text-grey-900">&nbsp;Recently Viewed</h4>
        <a href="{{ route('show_view') }}" class="fw-600 ms-auto font-xssss" style="text-decoration:none;">See all</a>
    </div>
    @forelse($views->take(3) as $viewed)
    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
        <figure class="avatar me-3"><img src="images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ \Illuminate\Support\Str::limit($viewed->post->content, 50, $end='...') }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Posted by: {{ $viewed->post->user->name }}</span></h4>
    </div>
    @empty
    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
        <p>Nothing in Saved</p>
    </div>
    @endforelse
</div>