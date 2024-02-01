<div class="card card-small">
    <div class="card-body">
        <h4>{{ $note->title }}</h4>

        <p>
            {{ $note->content }}
        </p>
    </div>

    <footer class="card-footer">
        <a href="{{ $editUrl }}" class="action-link action-edit">
            <i class="icon icon-pen"></i>
        </a>
        <a class="action-link action-delete" data-js-delete-note="{{ $note->id }}">
            <i class="icon icon-trash"></i>
        </a>
    </footer>
</div>

@pushOnce('scripts')
    <script>
        let deleteUrlPlaceholder = '{{ route('notes.destroy', ':id') }}';
        let csrfToken = '{{ csrf_token() }}';

        document.querySelectorAll('a[data-js-delete-note]').forEach(function (link) {
            link.addEventListener('click', function (event) {
                deleteNote(event.target.closest('a'));
            });
        });

        function deleteNote(deleteNoteLink) {
            let noteCard = deleteNoteLink.closest('.card');
            let noteId = deleteNoteLink.dataset.jsDeleteNote;
            let deleteNoteUrl = deleteUrlPlaceholder.replace(':id', noteId);

            noteCard.style.display = 'none';

            fetch(deleteNoteUrl, {
                method: 'DELETE',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify({
                    _token: csrfToken
                })
            }).then(function (response) {
                if (response.status !== 204) {
                    restoreNote(noteCard);
                    return;
                }

                noteCard.remove();
            }).catch(function (error) {
                restoreNote(noteCard);
            });
        }

        function restoreNote(noteCard) {
            alert('Ocurrió un error eliminando la nota');
            noteCard.style.display = 'flex';
        }
    </script>
@endPushOnce
