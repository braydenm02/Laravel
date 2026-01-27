<div class="bg-white p-3 vh-100">
    <input type="text" class="form-control" @isset($form) value="{!! $form->title !!}" @else value="Chapter Title"
    @endisset />

    <form method="POST" action="/dashboard/save">
        @csrf
        <textarea class="form-control" name="content" @isset($form) placeholder="{!! $form->content !!}" @else
        placeholder="Start writing your chapter here..." @endisset></textarea>
        <button type="submit" class="btn btn-primary mt-3">Save Chapter</button>
    </form>
</div>