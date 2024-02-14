@if(isset($isVideo) ?? null)
    <a href="{{ route('templates.renderVideoTemplate', $template->id) }}">newsletter link</a>
@else
    <a href="{{ route('templates.renderBoilerplate', $template->id) }}">newsletter link</a>
@endif
