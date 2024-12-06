// JavaScript for Makeup Makeover Website

// Add click event listeners to services list items
document.querySelectorAll('.services li').forEach((item) => {
    item.addEventListener('click', () => {
      alert(`You selected: ${item.textContent}`);
    });
  });
  
  // Validate email contact link
  const contactLink = document.querySelector('.contact a');
  contactLink.addEventListener('click', (event) => {
    event.preventDefault();
    
    const email = prompt("Enter your email to send an inquiry:");
    
    if (validateEmail(email)) {
      alert(`Thank you! We will respond to ${email} shortly.`);
      window.location.href = contactLink.href; // Redirect to email client
    } else {
      alert("Invalid email address. Please try again.");
    }
  });
  
  // Email validation function
  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
  
  // Add smooth scroll back to top button
  const backToTopBtn = document.createElement('button');
  backToTopBtn.textContent = "↑ Top";
  Object.assign(backToTopBtn.style, {
    position: 'fixed',
    bottom: '20px',
    right: '20px',
    padding: '10px',
    backgroundColor: '#5a5959',
    color: '#fff',
    border: 'none',
    borderRadius: '5px',
    cursor: 'pointer',
    display: 'none',
  });
  
  document.body.appendChild(backToTopBtn);
  
  // Show or hide back to top button based on scroll position
  window.addEventListener('scroll', () => {
    backToTopBtn.style.display = window.scrollY > 200 ? 'block' : 'none';
  });
  
  // Scroll smoothly to the top of the page when button is clicked
  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
  