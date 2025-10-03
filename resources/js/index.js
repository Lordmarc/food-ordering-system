
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

    // add to cart button js
    const addToCartButtons = document.querySelectorAll('.add-to-cart');


    let cart = [];

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const item = {
                id: button.dataset.id,
                name: button.dataset.name,
                price: parseFloat(button.dataset.price),
                image: button.dataset.image,
                quantity: 1
            };
            addToCart(item);
        });
    });

    function addToCart(item)
    {
        let existing = cart.find(i => i.id === item.id)

        if(existing)
        {
            existing.quantity += 1;
        }
        else{
            cart.push(item)
        }

        updateItemCount();

    }

    function updateItemCount()
    {
        let total = cart.length;
        document.querySelector('.item-count').textContent = total;
    }

    // pop up cart modal
    const cartButton = document.querySelector('.cart');
    

    cartButton.addEventListener('click', () => {
        const cartModal = document.getElementById('cart-popup');

        cartModal.classList.toggle('hidden');
    })
});
