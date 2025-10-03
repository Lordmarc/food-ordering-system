
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
        renderCart();
    }

    function renderCart()
    {
        const cartContainer = document.querySelector('.item-container');
       

        cartContainer.innerHTML = '';
        if(cart.length === 0){
              cartContainer.innerHTML = `<p>Your cart is empty.</p>`;
              updateItemCount();
              return;
           
        }
            cart.forEach((item, index) => {
            let div = document.createElement('div');

            let totalPrice = item.price * item.quantity;
            div.classList.add("flex", "justify-between", "items-center", 'border-b', "py-2");
            div.innerHTML = `
               
                <img src="${item.image}" class="w-12 h-12 rounded">
                <span>${item.name}</span>
                <span class="item-price text-md text-slate-500"><i class="fa-solid fa-peso-sign font-light text-md"></i>${totalPrice}</span>
                <button class="minusQty"><i class="fa-solid fa-minus"></i></button>
                <span>${item.quantity}</span>
                <button class="addQty"><i class="fa-solid fa-plus"></i></button>
            `;
            cartContainer.appendChild(div);

            const minusQty = div.querySelector('.minusQty');
            const addQty = div.querySelector('.addQty');
    

     

            minusQty.addEventListener("click", () => {
                if(item.quantity > 1){
                    item.quantity -= 1;
                }else {
                    cart.splice(index, 1);
                    
                }
                renderCart();
            });

            addQty.addEventListener('click', () => {
                item.quantity += 1;
        
                renderCart();
            });
          
        });

        
  updateItemCount();
       
    }

    function updateItemCount()
    {
        let total = cart.length;
        document.querySelector('.item-count').textContent = total;
    }

    // pop up cart modal
    const cartButton = document.querySelector('.cart');
    const closeBtn = document.getElementById('close-cart')
    
    const cartModal = document.getElementById('cart-popup');

    cartButton.addEventListener('click',toggleCart)

    closeBtn.addEventListener('click', toggleCart)

    function toggleCart() {
        cartModal.classList.toggle('hidden');
    }

});
