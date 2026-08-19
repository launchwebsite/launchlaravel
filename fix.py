import re

path = 'resources/views/home.blade.php'
with open(path, 'r', encoding='utf-8') as f:
    content = f.read()

parts = content.split('NICHE PART START')
if len(parts) > 1:
    # We want to replace exactly this pattern in the second half of the file
    # Pattern: {{ route('addetails', \Vinkla\Hashids\Facades\Hashids::encode($item->PR_Id)) }}
    
    # Simple string replace is safer
    target = "{{ route('addetails', \\Vinkla\\Hashids\\Facades\\Hashids::encode($item->PR_Id)) }}"
    parts[1] = parts[1].replace(target, '#')
    
    with open(path, 'w', encoding='utf-8') as f:
        f.write('NICHE PART START'.join(parts))
    print("Replaced successfully.")
else:
    print("NICHE PART START not found.")
