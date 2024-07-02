document.addEventListener('DOMContentLoaded', () => {
	const foodForm = document.getElementById('foodForm');
	const foodTable = document
		.getElementById('foodTable')
		.getElementsByTagName('tbody')[0];
	const imageFileInput = document.getElementById('image_file');
	const imagePreview = document.getElementById('image_preview');

	// Initialize Summernote
	$('#description').summernote({
		height: 100,
	});

	foodForm.addEventListener('submit', handleFormSubmit);
	imageFileInput.addEventListener('change', handleImagePreview);

	function handleFormSubmit(event) {
		event.preventDefault();

		if (!foodForm.checkValidity()) {
			displayErrors();
			return;
		}

		const foodId = document.getElementById('foodId').value;
		const name = document.getElementById('name').value;
		const description = $('#description').summernote('code');
		const origin = document.getElementById('origin').value;
		const category = document.getElementById('category').value;
		const priceRange = document.getElementById('price_range').value;
		const imageUrl = imagePreview.src;

		if (foodId) {
			updateFood(
				foodId,
				name,
				description,
				origin,
				category,
				priceRange,
				imageUrl
			);
		} else {
			addFood(name, description, origin, category, priceRange, imageUrl);
		}

		foodForm.reset();
		$('#description').summernote('reset');
		imagePreview.src = '';
		imagePreview.style.display = 'none';
		hideErrors();
	}

	function addFood(name, description, origin, category, priceRange, imageUrl) {
		const row = foodTable.insertRow();

		row.innerHTML = `
          <td>${name}</td>
          <td>${description}</td>
          <td>${origin}</td>
          <td>${category}</td>
          <td>${priceRange}</td>
          <td><img src="${imageUrl}" alt="${name}"></td>
          <td>
              <button class="edit-btn" onclick="editFood(this)">Edit</button>
              <button class="delete-btn" onclick="deleteFood(this)">Delete</button>
          </td>
      `;
	}

	function updateFood(
		id,
		name,
		description,
		origin,
		category,
		priceRange,
		imageUrl
	) {
		const row = document.querySelector(`tr[data-id="${id}"]`);
		row.cells[0].innerText = name;
		row.cells[1].innerHTML = description;
		row.cells[2].innerText = origin;
		row.cells[3].innerText = category;
		row.cells[4].innerText = priceRange;
		row.cells[5].innerHTML = `<img src="${imageUrl}" alt="${name}">`;

		document.getElementById('foodId').value = '';
		document.getElementById('submitBtn').innerText = 'Add Food';
	}

	window.editFood = function (button) {
		const row = button.parentElement.parentElement;
		const cells = row.cells;

		document.getElementById('foodId').value = row.rowIndex;
		document.getElementById('name').value = cells[0].innerText;
		$('#description').summernote('code', cells[1].innerHTML);
		document.getElementById('origin').value = cells[2].innerText;
		document.getElementById('category').value = cells[3].innerText;
		document.getElementById('price_range').value = cells[4].innerText;
		document.getElementById('image_file').value = '';
		imagePreview.src = cells[5].getElementsByTagName('img')[0].src;
		imagePreview.style.display = 'block';

		document.getElementById('submitBtn').innerText = 'Update Food';
	};

	window.deleteFood = function (button) {
		const row = button.parentElement.parentElement;
		row.remove();
	};

	function handleImagePreview(event) {
		const file = event.target.files[0];
		if (file) {
			const reader = new FileReader();
			reader.onload = function (e) {
				imagePreview.src = e.target.result;
				imagePreview.style.display = 'block';
			};
			reader.readAsDataURL(file);
		}
	}

	function displayErrors() {
		const inputs = foodForm.querySelectorAll('input, textarea');
		inputs.forEach((input) => {
			const errorSpan = document.getElementById(`${input.id}Error`);
			if (!input.checkValidity()) {
				errorSpan.style.display = 'block';
			} else {
				errorSpan.style.display = 'none';
			}
		});
	}

	function hideErrors() {
		const errors = foodForm.querySelectorAll('.error');
		errors.forEach((error) => {
			error.style.display = 'none';
		});
	}

	foodForm.addEventListener('input', hideErrors);
});
