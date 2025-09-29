
document.addEventListener("DOMContentLoaded", () => {
    const itemToggles = document.querySelectorAll(".view-item");

    itemToggles.forEach((item) => {
        item.addEventListener("click", () => {
            console.log("clicked!");
            const menu = item.parentElement.nextElementSibling;

            if (menu && menu.classList.contains('menu-item')) {
                menu.classList.toggle('hidden');
            }
        });
    });
});
