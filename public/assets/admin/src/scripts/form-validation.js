$(document).ready(function () {
    let base_url = window.location.origin;
    if(base_url == "http://localhost:8080"){
        base_url= 'http://localhost:8080';        
    }else{
        base_url;
    }

    // Form submission validation
    document.getElementById('save_branch_form').addEventListener('submit', function(e) {
        // Showroom Information
        const selectDealer = document.getElementById('selectDealer').value.trim();
        const branchType = document.getElementById('branchType').value.trim();
        const branchName = document.getElementById('branchName').value.trim();
        const chooseCountry = document.getElementById('chooseCountry').value.trim();
        const chooseState = document.getElementById('chooseState').value.trim();
        const chooseCity = document.getElementById('chooseCity').value.trim();
        const address = document.getElementById('address').value.trim();

        // Check if dealer is filled
        if (selectDealer === '') {
            alert('Please choose dealer.');
            e.preventDefault();
            return;
        }

        // Check if branch type is filled
        if (branchType === '') {
            alert('Please choose the branch type.');
            e.preventDefault();
            return;
        }

        // Check if Head Mobile No is filled
        if (branchName === '') {
            alert('Please enter the branch name.');
            e.preventDefault();
            return;
        }

        // Check if country is filled
        if (chooseCountry === '') {
            alert('Please choose country.');
            e.preventDefault();
            return;
        }

        // Check if State is selected
        if (chooseState === '') {
            alert('Please select the state.');
            e.preventDefault();
            return;
        }

        // Check if City is selected
        if (chooseCity === '') {
            alert('Please select the city.');
            e.preventDefault();
            return;
        }

        // Check if address is filled
        if (address === '') {
            alert('Please enter the address.');
            e.preventDefault();
            return;
        }

    });

});