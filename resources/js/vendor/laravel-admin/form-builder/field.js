if(window.Tagify)
{
    document.addEventListener('DOMContentLoaded', function() {
        const tagifyElements = document.querySelectorAll('[data-tagify="1"]');
        tagifyElements.forEach(element => {
            const maxTags = element.getAttribute('data-tagify-maxTags') || 'Infinity';
            const dataUrl = element.getAttribute('data-tagify-url');
            const tagify = new Tagify(element, {
                maxTags: maxTags
            });

            if (dataUrl) {
                tagify.on('input', function (e) {
                    var controller;
                    const value = e.detail.value;
                    if (value.length > 0) {
                        controller && controller.abort();
                        controller = new AbortController();
                        tagify.loading(true);
                        fetch(`${element.getAttribute('data-tagify-url')}?search=${value}&autocomplete=1`, {signal:controller.signal})
                            .then(response => response.json())
                            .then(data => {
                                tagify.whitelist = data;
                                tagify.loading(false).dropdown.show(value);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    }
                });
            }
        });
    });
}

if(window.Choices)
{
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('[data-choices="1"]');
        elements.forEach(element => {
            const removeItemButton = element.getAttribute('data-choices-removeItemButton') != 0;
            const maxItemCount = element.getAttribute('data-choices-maxItemCount') || -1;
            const addChoices = element.getAttribute('data-choices-addChoices') != 0;
            const choices = new Choices(element, {
                removeItemButton: removeItemButton,
                maxItemCount: maxItemCount,
                addChoices: addChoices
            });
            const dataUrl = element.getAttribute('data-choices-url');
            if (dataUrl) {
                choices.passedElement.element.addEventListener(
                'search', async (event) => {
                    try {
                        var controller;
                        controller && controller.abort();
                        controller = new AbortController();
                        const items = await fetch(`${dataUrl}?search=${event.detail.value}&autocomplete=1`, {signal:controller.signal});
                        const data = await items.json();
                        // Clear existing choices
                        choices.clearChoices();
                        
                        // Set new choices
                        choices.setChoices(data, 'value', 'label', true);
                    } catch (err) {
                        console.error(err);
                    }
                });
            }
        });
    });
}