async function openLibrarySearchGeneric(){
	openLibraryPopulateDropdown(await fetch(`https://openlibrary.org/search.json?q=${(document.getElementById("open_library_search_bar").value.split(' ')).join('+')}&fields=key,title,author_name,cover_i,first_publish_year,editions&limit=10`)
        .then(response => {return response.json();})
        .then(data => {return data;})
        .catch(error => console.error('Error:', error)));
}

async function openLibrarySearchByFields(){
	let title = document.getElementById("open_library_search_title").value;
	let author = document.getElementById("open_library_search_author").value;
	let year = document.getElementById("open_library_search_year").value;
	
	if (title + author + year == "") return;
	
	openLibraryPopulateDropdown(await fetch(`https://openlibrary.org/search.json?${title == "" ? "" : `title=${title}&`}${author == "" ? "" : `author=${author}&`}${year == "" ? "" : `year=${year}&`}fields=key,title,author_name,cover_i,first_publish_year,editions&limit=10`)
        .then(response => {return response.json();})
        .then(data => {return data;})
        .catch(error => console.error('Error:', error)));
}

function openLibraryPopulateDropdown(books){
	let searchDropdown = document.getElementById("open_library_search_dropdown");
	if (books.num_found == 0) searchDropdown.textContent = "No results found";
	else{
		let bookResults = [];
		for (let i = 0; i < books.num_found; i++)
			bookResults.push(formatOpenLibraryListItem(books[i]);
		searchDropdown.innerHTML = bookResults.join('');
	}
}

function formatOpenLibraryListItem(book_obj){
	return "";
}