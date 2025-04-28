const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");
function setActiveLink() {
    let closestSection = null;
    let closestOffset = Number.POSITIVE_INFINITY;
    // Handle the case where the page is at the top (initial load)
    if (window.scrollY === 0) {
        // Ensure the "Home" link is active when at the top
        document
            .querySelector('.nav-link[href="#home"]')
            .classList.add("active");
        return; // Early return to avoid further processing
    }
    sections.forEach((section) => {
        const sectionTop = section.getBoundingClientRect().top;
        if (sectionTop >= 0 && sectionTop < closestOffset) {
            closestOffset = sectionTop;
            closestSection = section;
        }
    });
    // Remove the active class from all links
    navLinks.forEach((link) => {
        link.classList.remove("active");
    });
    // Add active class to the corresponding link of the closest section
    if (closestSection) {
        const id = closestSection.getAttribute("id");
        const activeLink = document.querySelector(`.nav-link[href="#${id}"]`);
        if (activeLink) {
            activeLink.classList.add("active");
        }
    }
}
// Initialize on page load to handle the first active link
window.addEventListener("load", setActiveLink);
// Update active link on scroll
window.addEventListener("scroll", setActiveLink);
