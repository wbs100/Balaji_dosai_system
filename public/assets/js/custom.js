// Run on load and resize
// function setNavHeight() {
//     const nav = document.getElementById('nav');
//     const navHeight = nav.offsetHeight;
//     document.documentElement.style.setProperty('--nav-height', `${navHeight}px`);
// }

// window.addEventListener('load', setNavHeight);
// window.addEventListener('resize', setNavHeight);

// Mobile menu toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mobileMenu = document.querySelector('.mobile-nav-menu');
    
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            
            // Animate hamburger icon
            const spans = mobileToggle.querySelectorAll('span');
            if (mobileMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
        
        // Close menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                const spans = mobileToggle.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });
    }
});

// cart menu logic
document.addEventListener('DOMContentLoaded', function() {
const cartBtn = document.querySelector('.btn-cart.real-cart');
const cartDropdown = document.querySelector('.cart-dropdown .dropdown-menu');

if (cartBtn && cartDropdown) {
    cartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Toggle dropdown visibility
        if (cartDropdown.classList.contains('show')) {
            cartDropdown.classList.remove('show');
        } else {
            cartDropdown.classList.add('show');
        }
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!cartBtn.contains(e.target) && !cartDropdown.contains(e.target)) {
            cartDropdown.classList.remove('show');
        }
    });
    
    // Prevent dropdown from closing when clicking inside it
    cartDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });
}
});

// ====================================
// Menu Tab Functionality
// ====================================
document.addEventListener('DOMContentLoaded', function() {
    const menuTabs = document.querySelectorAll('.menu-tab');
    const menuItems = document.querySelectorAll('.menu-item');

    // Show dosa items by default
    menuItems.forEach(item => {
        if (item.getAttribute('data-category') === 'dosa') {
            item.classList.add('active');
        }
    });

    // Tab click handler
    menuTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.getAttribute('data-category');

            // Update active tab
            menuTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Filter menu items
            menuItems.forEach(item => {
                if (item.getAttribute('data-category') === category) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    });

    // ====================================
    // FAQ Accordion Functionality
    // ====================================
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', function() {
            // Close all other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });

            // Toggle current item
            item.classList.toggle('active');
        });
    });
});