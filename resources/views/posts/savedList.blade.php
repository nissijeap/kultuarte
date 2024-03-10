<div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
    <div class="card-body d-flex align-items-center p-4" style="color: #e15600 !important;">
    <span class="material-symbols-outlined">bookmark</span>
        <h4 class="fw-700 mb-0 font-xs">&nbsp;Saved</h4>
        <a href="{{ route('show_saved') }}" class="fw-600 ms-auto font-xssss" style="text-decoration:none;">See all</a>
    </div>
    @forelse($saves->take(2) as $saved)
    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
        <figure class="avatar me-3"><img src="images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
        <h4 class="fw-700 text-grey-900 font-xssss mt-1">{{ \Illuminate\Support\Str::limit($saved->post->content, 50, $end='...') }}<span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500">Posted by: {{ $saved->post->user->name }}</span></h4>
    </div>
    @empty
    <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 border-top-xs bor-0">
        <p>Nothing in Saved</p>
        <a href="{{ route('restore') }}"><i class="mdi mdi-restore" data-toggle="tooltip" title="Restore Ticket">Restore Post</i></a>
    </div>
    @endforelse
</div>