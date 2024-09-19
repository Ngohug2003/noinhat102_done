@extends('Layouts.Admin.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Danh sách danh mục</h1>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Slider</th>
                        <th>Mô tả </th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên Slider</th>
                        <th>Mô tả </th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($slider as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                                <div class="form-check form-switch mb-4">
                                    <input disabled class="form-check-input" type="checkbox" id="active_slide_{{ $value->id }}"
                                        data-id="{{ $value->id }}" {{ $value->active ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                        
                                <a href="{{ route('admin.editSlider', $value->id) }}" class="btn btn-warning btn-sm" title="Chỉnh sửa">
                                    <i class="fas fa-edit"></i> Chỉnh sửa
                                </a>
                                <form action="{{ route('admin.destroySlider', $value->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?');">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.form-check-input').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');
                    const isActive = this.checked ? 1 : 0;

                    // Nếu slide được bật, kiểm tra số lượng slide đang hoạt động
                    if (isActive === 1) {
                        fetch('{{ route('admin.checkActiveSlides') }}', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        
                        .then(response => response.json())
                        .then(data => {
                            if (data.activeSlideCount > 0) {
                                alert('Chỉ được bật một slide. Vui lòng tắt slide khác trước khi bật slide này.');
                                this.checked = false;
                                return;
                            }

                            // Nếu không có slide nào khác đang hoạt động, tiếp tục cập nhật trạng thái
                            updateSlideStatus(id, isActive);
                        })
                        .catch(error => console.error('Error:', error));
                    } else {
                        // Nếu slide được tắt, cập nhật trạng thái ngay lập tức
                        updateSlideStatus(id, isActive);
                    }
                });
            });

            function updateSlideStatus(id, isActive) {
                fetch('{{ route('admin.updateSliderStatus') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        id: id,
                        active: isActive
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Cập nhật trạng thái thành công.');
                    } else {
                        console.error('Failed to update status:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection
