@extends('layouts.app')
@section('title', 'Backup List')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="mb-3">
                        <x-atoms.form-label for="name_field" required>Nama Backup</x-atoms.form-label>
                        <x-atoms.input name="name" id="name_field" placeholder="Masukkan Nama Backup" :value="$backupSchedule->name"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <x-atoms.form-label for="frequency_field" required>Frekuensi Backup</x-atoms.form-label>
                        <x-atoms.input name="frequenc" id="frequency_field" placeholder="" readonly :value="$backupSchedule->frequency" />
                    </div>
                    <div class="mb-3">
                        <x-atoms.form-label for="time_field" required>Waktu Backup</x-atoms.form-label>
                        <x-atoms.input name="time" id="time_field" type="time" placeholder="Tentukan Waktu Backup"
                            :value="$backupSchedule->time" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="tables" class="form-label required">Tabel</label>
                        <x-mollecules.checkbox-group :lists="$ref_tables" :values="$curr_tables" name="tables"
                            childClass="col-sm-12 col-md-6 col-lg-4" disabled />
                    </div>

                </div>
                <label for="history" class="form-label">Histori Backup</label>
                <table class="table table-responsive mb-3">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Status Backup</th>
                            <th>Nama File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($backupHistories->count() > 0)
                            @foreach ($backupHistories as $backupHistory)
                                <tr>
                                    <td>{{ $backupHistory->created_at }}</td>
                                    <td>{{ $backupHistory->status }}</td>
                                    <td>{{ $backupHistory->file_name }}</td>
                                    <td>
                                        @if ($backupHistory->file_name)
                                            <a href="{{ route('setting.backup.download', ['backup_name' => $backupHistory->file_name]) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-download fs-3"></i>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada history</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end g-2 mb-3">
                    @can($globalModule['delete'])
                        <button action-need-confirm="true" class="btn btn-danger"
                            data-action-text="Are you sure to delete this backup schedule named '{{ $backupSchedule->name }}'?"
                            data-action-url="{{ route('setting.backup.destroy', $backupSchedule->id) }}" id="delete-backup_btn">
                            <i class="fas fa-trash fs-3"></i>
                            <span class="ms-2">Hapus</span>
                        </button>
                    @endcan
                    @can($globalModule['update'])
                        <a href="{{ route('setting.backup.edit', ['backupSchedule' => $backupSchedule]) }}">
                            <button class="btn btn-warning mx-2">
                                <i class="fas fa-pen fs-3"></i><span class="ms-2">Edit</span>
                            </button>
                        </a>
                    @endcan
                    <form id="backup-form" action="{{ route('setting.backup.run', ['backupSchedule' => $backupSchedule]) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info mx-2">
                            <i class="fas fa-cloud-download fs-3">
                            </i>
                            <span class="ms-2">Backup Sekarang</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function submitUpdateForm() {
            document.getElementById('update-backup-form').submit();
        }
    </script>
@endpush
