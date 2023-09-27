// Function for adding the products with quantity to the carts component
document.getElementById('cartForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    
    const formData = new FormData(event.target); // Get form data
    const url = event.target.getAttribute('action'); // Get the form action URL
    
    // Perform Ajax request
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content, // Add CSRF token
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Product added to cart successfully');
            
            // Update the cart content using the received data
            updateCartUI(data.carts);

            // document.getElementById('checkout-cart').classList.add = 'none';
            
            const subtotalPrice = document.getElementById('subtotalPrice');
      subtotalPrice.textContent = data.totalPrice ; // Assuming data.totalPrice is the updated total price
        } else {
            console.error('Failed to add product to cart');
            // Display an error message or take appropriate action
        }
    })
    .catch(error => {
        console.error('An error occurred:', error);
        // Handle errors, display error message, etc.
    });
});


function updateCartUI(carts) {
    const cartList = document.getElementById('cartList');
    cartList.innerHTML = ''; // Clear the existing content

    // Loop through the carts and create the updated cart items
    carts.forEach(cart => {
        const newItem = document.createElement('li');
        const csrf = document.head.querySelector("[name=csrf-token]").content;
        newItem.className = 'flex py-6';
        const id = `${cart.id}`;
        newItem.innerHTML = `
            <!-- Your complete HTML structure here -->
            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                <img src="${cart.product.photo}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
            </div>
            <div class="ml-4 flex flex-1 flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="#">${cart.product.nom}</a>
                        </h3>
                        <p class="ml-4">${cart.product.prix * cart.quantity} <sup>dhs</sup></p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Salmon</p>
                </div>
                <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Quantité ${cart.quantity}</p>
                    <form id="cart-id-${cart.id}" data-cart-id="${cart.id}" action="/cart/${cart.id}" method="POST" class="flex cart-remove-form">
                        <input type="hidden" name="_token"  value="${csrf}" >
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit" class="font-medium text-second-color remove-button">Remove</button>
                    </form>
                </div>
            </div>
            <!-- Your complete HTML structure here -->
        `;
        cartList.appendChild(newItem);
    });
}
// Function for adding the products with quantity to the carts component





// Function to remove the products from the carts component
document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
        const removeButton = event.target.closest('.remove-button');
        if (removeButton) {
            event.preventDefault(); // Prevent default behavior of the button

            const cartForm = removeButton.closest('.cart-remove-form');
            const cartId = cartForm.getAttribute('data-cart-id');
            const csrfToken = document.head.querySelector("[name=csrf-token]").content;

            // Send an AJAX request to remove the cart item
            fetch(`/cart/${cartId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Handle the successful removal (e.g., remove the item from the UI)
                    const cartItem = cartForm.closest('.flex.py-6');
                    if (cartItem) {
                        cartItem.remove();
                                                // Update the total price
                const totalElement = document.querySelector('.total-price');
                if (totalElement) {
                    totalElement.textContent = data.totalPrice;
                }

                    }

                } else {
                    console.error('Failed to remove cart item');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
        }
    });
});
// Function to remove the products from the carts component



// Function to add the products to the wishlist

// Function to add the products to the wishlist





// Function to remove the products from wishlists component (in the wishlist component)

// Function to remove the products from wishlists component (in the wishlist component)



// Function to add the products from wishlist to cart components(need to be modifed)

// Function to add the products from wishlist to cart components(need to be modifed)



// The wishlist component design to be displayed or closed

// The wishlist component design to be displayed or closed



