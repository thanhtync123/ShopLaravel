document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide) {
        window.lucide.createIcons();
    }

    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobilePanel = document.querySelector('[data-mobile-menu]');
    const toast = document.querySelector('[data-toast]');

    const showToast = (message = 'Đã thêm vào giỏ hàng') => {
        if (!toast) return;
        toast.textContent = message;
        toast.classList.add('is-visible');
        window.clearTimeout(showToast.timer);
        showToast.timer = window.setTimeout(() => {
            toast.classList.remove('is-visible');
        }, 1800);
    };

    if (menuToggle && header && mobilePanel) {
        menuToggle.addEventListener('click', () => {
            const isOpen = header.classList.toggle('is-open');
            document.body.classList.toggle('is-menu-open', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
        });

        mobilePanel.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                header.classList.remove('is-open');
                document.body.classList.remove('is-menu-open');
                menuToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    document.querySelectorAll('[data-add-cart]').forEach((button) => {
        button.addEventListener('click', () => showToast());
    });

    document.querySelectorAll('[data-qty]').forEach((control) => {
        const input = control.querySelector('input');
        const minus = control.querySelector('[data-qty-minus]');
        const plus = control.querySelector('[data-qty-plus]');

        if (!input) return;

        minus?.addEventListener('click', () => {
            input.value = Math.max(Number(input.min || 1), Number(input.value || 1) - 1);
        });

        plus?.addEventListener('click', () => {
            input.value = Number(input.value || 1) + 1;
        });
    });

    document.querySelectorAll('.product-gallery').forEach((gallery) => {
        const mainImage = gallery.querySelector('.product-gallery__main img');
        const thumbs = gallery.querySelectorAll('.product-gallery__thumbs button');

        thumbs.forEach((thumb) => {
            thumb.addEventListener('click', () => {
                const image = thumb.querySelector('img');
                if (!image || !mainImage) return;
                mainImage.src = image.src;
                thumbs.forEach((item) => item.classList.remove('is-active'));
                thumb.classList.add('is-active');
            });
        });
    });

    document.querySelectorAll('.swatches, .size-grid, .segmented').forEach((group) => {
        group.querySelectorAll('button').forEach((button) => {
            button.addEventListener('click', () => {
                group.querySelectorAll('button').forEach((item) => item.classList.remove('is-active'));
                button.classList.add('is-active');
            });
        });
    });

    document.querySelectorAll('.newsletter, .coupon-form, .checkout-form, .contact-form, .account-panel form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            showToast('Đã ghi nhận thông tin');
        });
    });
});
