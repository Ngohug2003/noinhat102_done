$(document).ready(function() {
    // Load provinces on page load
    $.ajax({
        url: '/api/provinces',
        method: 'GET',
        success: function(data) {
            let provinceSelect = $('#province');
            provinceSelect.empty();
            provinceSelect.append('<option value="">Chọn tỉnh thành</option>');
            $.each(data, function(key, value) {
                provinceSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Error fetching provinces:', error);
        }
    });         

    // Load districts based on selected province
    $('#province').change(function() {
    let provinceId = $(this).val();
    console.log('Selected province ID:', provinceId); // Debugging line
    if (provinceId) {
        $.ajax({
            url: '/api/districts/' + provinceId,
            method: 'GET',
            success: function(data) {
                let districtSelect = $('#district');
                districtSelect.empty();
                districtSelect.append('<option value="">Chọn quận huyện</option>');
                $.each(data, function(key, value) {
                    districtSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                $('#ward').empty().append('<option value="">Chọn phường xã</option>'); // Clear wards
            },
            error: function(xhr, status, error) {
                console.error('Error fetching districts:', error);
            }
        });
    } else {
        $('#district').empty().append('<option value="">Chọn quận huyện</option>');
        $('#ward').empty().append('<option value="">Chọn phường xã</option>');
    }
});

    // Load wards based on selected district
    $('#district').change(function() {
        let districtId = $(this).val();
        $.ajax({
            url: '/api/wards/' + districtId,
            method: 'GET',
            success: function(data) {
                let wardSelect = $('#ward');
                wardSelect.empty();
                wardSelect.append('<option value="">Chọn phường xã</option>');
                $.each(data, function(key, value) {
                    wardSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching wards:', error);
            }
        });
    });
});
