document.addEventListener("DOMContentLoaded", function () {
  const estimateShippingContainer = document.querySelector(
    ".eb-estimate-shipping-container"
  );
  const estimateShippingPopup = document.querySelector(
    ".eb-estimate-shipping-popup-wrapper"
  );
  estimateShippingContainer.addEventListener("mouseover", function () {
    estimateShippingPopup.style.display = "block";
  });
  estimateShippingContainer.addEventListener("mouseout", function () {
    estimateShippingPopup.style.display = "none";
  });
  const orderPlacedSpan = estimateShippingPopup.querySelectorAll(
    ".eb-stepper-item-content-day"
  )[0];
  const orderShippedSpan = estimateShippingPopup.querySelectorAll(
    ".eb-stepper-item-content-day"
  )[1];
  const deliveredSpan = estimateShippingPopup.querySelectorAll(
    ".eb-stepper-item-content-day"
  )[2];
  const showShipping = document.querySelector(".showShipping");
  const today = new Date();
  const orderPlacedDate = new Date(today);
  const orderShippedDate = new Date(today);
  orderShippedDate.setDate(orderShippedDate.getDate() + 1); 
  const deliveredDate = new Date(today);
  deliveredDate.setDate(deliveredDate.getDate() + 7); 
  function formatDate(date) {
    const options = {
      month: "short",
      day: "numeric",
    };
    return new Intl.DateTimeFormat("vi-VN", options).format(date);
  }

  function addDays(date, days) {
    const result = new Date(date);
    result.setDate(date.getDate() + days);
    return result;
  }
  showShipping.textContent = formatDate(deliveredDate) + " - " + formatDate(addDays(deliveredDate, 2)); 
  orderPlacedSpan.textContent = formatDate(orderPlacedDate);
  orderShippedSpan.textContent = formatDate(orderShippedDate) + " - " + formatDate(addDays(orderShippedDate, 1)); 
  deliveredSpan.textContent = formatDate(deliveredDate) + " - " + formatDate(addDays(deliveredDate, 2)); 
});
