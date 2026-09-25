(() => {
  'use strict';
  const form = document.querySelector('.fronex-editor form');
  if (!form) return;
  let dirty = false;
  const refresh = field => {
    const preview = field.querySelector('.fronex-image-preview');
    if (preview) {
      const url = field.querySelector('input').value;
      preview.hidden = !url;
      if (url) preview.src = url;
      else preview.removeAttribute('src');
    }
    dirty = true;
  };
  form.addEventListener('input', event => {
    const field = event.target.closest('.fronex-editor-field');
    if (field) refresh(field);
  });
  form.addEventListener('click', event => {
    const button = event.target.closest('[data-default], [data-media]');
    if (!button) return;
    const field = button.closest('.fronex-editor-field');
    const input = field.querySelector('input, textarea');
    if (button.hasAttribute('data-default')) {
      input.value = button.dataset.default;
      refresh(field);
      input.focus();
      return;
    }
    const picker = wp.media({ title: 'Choose homepage image', button: { text: 'Use this image' }, library: { type: 'image' }, multiple: false });
    picker.on('select', () => {
      input.value = picker.state().get('selection').first().toJSON().url;
      refresh(field);
    });
    picker.open();
  });
  form.addEventListener('submit', () => { dirty = false; });
  window.addEventListener('beforeunload', event => {
    if (dirty) { event.preventDefault(); event.returnValue = ''; }
  });
})();
