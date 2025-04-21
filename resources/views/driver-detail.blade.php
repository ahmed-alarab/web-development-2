<!DOCTYPE html>
<html>
<head>
    <title>Driver Detail</title>
    <link href="{{ asset('css/DriverDetails.css') }}" rel="stylesheet">
</head>
<body>
    <div class="driver-detail-container">
        <h2 class="page-heading" id="driver-name">Driver Reviews</h2>
        <div class="driver-detail-card">
            <h3 class="driver-detail-title" id="driver-rating">Rating: </h3>
            <div class="driver-review-section">
                <h4 class="text-xl font-semibold">Reviews:</h4>
                <div id="reviews"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", async () => {
        const pathParts = window.location.pathname.split("/");
        const driverId = pathParts[pathParts.length - 1];
        const token = localStorage.getItem("token");

        try {
            const res = await axios.get(`http://localhost:8000/api/drivers/${driverId}`, {
                headers: { Authorization: `Bearer ${token}` }
            });

            const reviews = res.data.data;

            // Set basic driver info (we take name from the first review's client if available)
            const driverName = reviews.length > 0 ? reviews[0].client.name : "Unknown Driver";
            document.getElementById("driver-name").textContent = `${driverName}'s Reviews & Rating`;

            // Calculate average rating
            const avgRating = reviews.length
                ? (reviews.reduce((sum, r) => sum + r.rating, 0) / reviews.length).toFixed(1)
                : "No Rating";
            document.getElementById("driver-rating").textContent = `Average Rating: ${avgRating}`;

            const reviewsContainer = document.getElementById("reviews");

            if (reviews.length > 0) {
                reviews.forEach(review => {
                    const card = document.createElement("div");
                    card.className = "review-card";
                    card.innerHTML = `
                        <p class="review-card-text">"${review.review}"</p>
                        <p class="review-card-rating">Rating: ${review.rating}</p>
                        <p class="review-card-client">By: ${review.client?.name || 'Unknown Client'}</p>
                    `;
                    reviewsContainer.appendChild(card);
                });
            } else {
                reviewsContainer.innerHTML = "<p>No reviews available yet.</p>";
            }
        } catch (err) {
            console.error('Error fetching driver reviews:', err);
            document.querySelector(".driver-detail-container").innerHTML = `<p class="error-message">Error loading driver details. Please try again later.</p>`;
        }
    });
    </script>
</body>
</html>
