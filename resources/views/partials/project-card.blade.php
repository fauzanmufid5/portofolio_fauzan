@props(['project'])
<a href="{{ route('projects.show', $project) }}" class="card-hover reveal block rounded-2xl overflow-hidden border border-white/10 bg-zinc-900/60">
    <div class="aspect-video overflow-hidden bg-zinc-800">
        @if($project->image)
            <img src="{{ str_starts_with($project->image, 'http') ? $project->image : Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover" loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center text-5xl font-display font-bold text-zinc-700">{{ substr($project->title, 0, 1) }}</div>
        @endif
    </div>
    <div class="p-5">
        <div class="flex items-center gap-2 mb-2">
            @if($project->is_featured)
                <span class="text-[11px] font-semibold px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">FEATURED</span>
            @endif
        </div>
        <h3 class="font-display font-semibold text-lg leading-snug">{{ $project->title }}</h3>
        <p class="text-sm text-zinc-400 mt-1 line-clamp-2">{{ $project->short_desc }}</p>
        @if($project->tech_stack)
            <div class="flex flex-wrap gap-1.5 mt-3">
                @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                    <span class="text-[11px] px-2 py-0.5 rounded-md bg-white/5 border border-white/10 text-zinc-300">{{ $tech }}</span>
                @endforeach
            </div>
        @endif
    </div>
</a>
