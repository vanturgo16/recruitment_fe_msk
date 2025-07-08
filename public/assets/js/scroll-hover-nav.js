document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".nav-link");
    const defaultLink = document.querySelector('.nav-link[href="#nav-home"]');

    function onScroll() {
        const scrollPos = window.scrollY + window.innerHeight / 2;
        let found = false;

        sections.forEach((section) => {
            const top = section.offsetTop;
            const bottom = top + section.offsetHeight;
            const id = section.getAttribute("id");

            if (scrollPos >= top && scrollPos < bottom) {
                navLinks.forEach((link) => {
                    link.classList.remove("active");
                    if (link.getAttribute("href").includes(`#${id}`)) {
                        link.classList.add("active");
                    }
                });
                found = true;
            }
        });

        // Fallback to default if no section matched
        if (!found && defaultLink) {
            navLinks.forEach((link) => link.classList.remove("active"));
            defaultLink.classList.add("active");
        }
    }

    // Initial run
    onScroll();
    window.addEventListener("scroll", onScroll);
});
