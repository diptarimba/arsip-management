<div class="mb-2">
    @push('header-add')
    <script src="https://cdn.tiny.cloud/1/x61txi65waq5l8vtwt1z75jndvjgtoi1un8bjvknmnso30yo/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            convert_urls: false,
            relative_urls : false,
            remove_script_host : true,
            document_base_url : 'http://localhost:8000/',
            images_upload_url: '{{ route("wysiwyg.store") }}',
            plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
    @endpush
    <div class="col-form-label">{{ $label }}</div>
    <textarea name="{{ $name }}" id="editor" class="editor" cols="30" rows="10">{!! $value !!}</textarea>
    @if(!isset($manual))
    @push('footer-add')
    @endpush
    @endif
</div>
