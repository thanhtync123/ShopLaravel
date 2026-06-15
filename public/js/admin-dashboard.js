(function () {
    const body = document.body;
    const toggle = document.querySelector('[data-admin-toggle]');
    const scrim = document.querySelector('[data-admin-scrim]');
    const sidebar = document.querySelector('[data-admin-sidebar]');
    const tasks = document.querySelectorAll('.task-item input');
    const selectAllProducts = document.querySelector('[data-select-all-products]');
    const productChecks = document.querySelectorAll('[data-product-check]');

    function setSidebar(open) {
        body.classList.toggle('is-sidebar-open', open);

        if (toggle) {
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        }
    }

    if (window.lucide) {
        window.lucide.createIcons();
    }

    if (toggle && sidebar) {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.addEventListener('click', function () {
            setSidebar(!body.classList.contains('is-sidebar-open'));
        });
    }

    if (scrim) {
        scrim.addEventListener('click', function () {
            setSidebar(false);
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setSidebar(false);
        }
    });

    tasks.forEach(function (checkbox) {
        const item = checkbox.closest('.task-item');

        function syncTaskState() {
            if (item) {
                item.classList.toggle('is-done', checkbox.checked);
            }
        }

        syncTaskState();
        checkbox.addEventListener('change', syncTaskState);
    });

    if (selectAllProducts && productChecks.length) {
        function syncSelectAllState() {
            const checkedCount = Array.from(productChecks).filter(function (checkbox) {
                return checkbox.checked;
            }).length;

            selectAllProducts.checked = checkedCount === productChecks.length;
            selectAllProducts.indeterminate = checkedCount > 0 && checkedCount < productChecks.length;
        }

        selectAllProducts.addEventListener('change', function () {
            productChecks.forEach(function (checkbox) {
                checkbox.checked = selectAllProducts.checked;
            });
            syncSelectAllState();
        });

        productChecks.forEach(function (checkbox) {
            checkbox.addEventListener('change', syncSelectAllState);
        });

        syncSelectAllState();
    }
})();
