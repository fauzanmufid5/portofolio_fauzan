import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Typing effect for hero roles
document.addEventListener('DOMContentLoaded', () => {
    const el = document.querySelector('[data-typing]');
    if (el) {
        const words = el.dataset.typing.split('|');
        let wi = 0, ci = 0, deleting = false;
        const tick = () => {
            const word = words[wi];
            el.textContent = word.slice(0, ci);
            let delay = deleting ? 45 : 90;
            if (!deleting && ci === word.length) {
                delay = 1600;
                deleting = true;
            } else if (deleting && ci === 0) {
                deleting = false;
                wi = (wi + 1) % words.length;
                delay = 350;
            }
            ci += deleting ? -1 : 1;
            setTimeout(tick, delay);
        };
        tick();
    }

    // Scroll reveal
    const observer = new IntersectionObserver(
        (entries) => entries.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        }),
        { threshold: 0.12 }
    );
    document.querySelectorAll('.reveal').forEach((n) => observer.observe(n));
});
