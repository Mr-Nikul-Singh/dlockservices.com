
var textareaIds = ['mytextarea1', 'mytextarea2', 'mytextarea3', 'mytextarea4', 'mytextarea5', 'mytextarea6', 'nonExistentTextarea'];

// Function to initialize CKEditor instances with custom configurations
function initializeCKEditor() {
    textareaIds.forEach(function (id) {
        var textarea = document.getElementById(id);
        if (textarea) {
            // Customize the CKEditor configuration
            CKEDITOR.replace(id, {
                // Define the toolbar configuration
                toolbar: [
                    { name: 'document', items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates'] },
                    { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
                    // Customize the toolbar items as needed
                    { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
                    { name: 'styles', items: ['Styles', 'Format'] },
                    { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
                    '/',
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                    { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                    { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] },
                    '/',
                    { name: 'colors', items: ['TextColor', 'BGColor'] },
                    { name: 'others', items: ['-'] },
                    { name: 'about', items: ['About'] }
                ],
                // Remove specific buttons or menu items (e.g., 'Source' and 'Templates')
                removeButtons: 'Source,Templates,About,SpecialChar,Paste,PasteFromWord,PasteText,Image'
            });
        } 
        // else {
        //     console.warn('Textarea with ID "' + id + '" not found.');
        // }
    });
}

// Call the function to initialize CKEditor with custom configurations
initializeCKEditor();