const footer = $('#footer-license');

if (footer.length) {
    footer.html(" © 2025-present Brayden Miranda, Ana Cedillo. <a href=\"license\">The information contained herein is subject to change without notice.</a>");
    footer.parent('footer').css({ 'margin-top': 'auto', });
} else {
    let newFooter = `<footer id="footer-license" class="text-center mt-auto p-3">
                                 © 2025-present Brayden Miranda, Ana Cedillo.`;
    if (!window.location.pathname.toLowerCase().includes('license')) {
        newFooter += ` <a href="license">The information contained herein is subject to change without notice.</a>
                              </footer>`;
    } else {
        newFooter += ` The information contained herein is subject to change without notice.
                              </footer>`;
    }
    $('body').append(newFooter);
}