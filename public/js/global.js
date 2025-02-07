// API CALL
function cLoad(status = true, txt = 'Aguarde...') {
    if (!status) return $('#body-loading').remove();
    let $load = $(`<div id="body-loading" style="position: fixed; top: 0px; left: 0px; width: 100%; background: rgba(255, 255, 255, 0.85); height: 100dvh; display: flex; align-items: center; justify-content: center; flex-direction: row; gap: 10px; font-size: 18px; font-weight: 600; backdrop-filter: blur(2px);"><i class="fas fa-spinner fa-spin"></i> <p>${txt}</p></div>`);
    $('body').append($load);
}
