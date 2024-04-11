// Wait for the DOM content to load before executing the code
document.addEventListener("DOMContentLoaded", function () {
  // Get references to the required elements
  const fullName = document.querySelector("#fullName");
  const address = document.querySelector("#address");
  const mail = document.querySelector("#email");
  const contact = document.querySelector("#contact");
  const job = document.querySelector("#job");
  const queries = document.querySelector("#questions");
  const sendButton = document.querySelector(".send");

  // Event listener for search button click
  if (sendButton) {
    sendButton.addEventListener("click", function () {
      const data = {
        fullName: fullName.value,
        address: address.value,
        mail: mail.value,
        contact: contact.value,
        job: job.value,
        queries: queries.value,
      };

      sendData(data);
    });
  }

  // program to send data in the backend
  // Function to send weather data to the backend with rate limiting
  async function sendData(data) {
    const url = "http://localhost/PaswsAbode/recorddata.php";

    const options = {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
        "Content-Type": "application/json",
      },
    };

    const response = await fetch(url, options);

    if (response.ok) {
      const responseData = await response.json();
      console.log(responseData);
    }
  }
});
