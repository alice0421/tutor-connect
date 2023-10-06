@props(['teacher'])

<form class="flex mt-4 space-x-3" action="{{ route('matching.apply', ['teacher' => $teacher->id]) }}" method="POST">
    @csrf
    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">指導申請</button>
    <a href="{{ route('teacher.profile.show', ['teacher' => $teacher->id]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">講師詳細</a>
</form>
