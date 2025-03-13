<x-site-layout>

    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vacancies as $vacancy)
                    <tr>
                        <td>{{ $vacancy->title }}</td>
                        <td>
                            <!-- Links for actions -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No vacancies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    
</x-site-layout>