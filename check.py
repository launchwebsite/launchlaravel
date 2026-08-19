with open('resources/views/home.blade.php', encoding='utf-8') as f:
    for i, line in enumerate(f):
        if 'class="tab-pane' in line:
            print(f'TAB: {i+1}')
        if '<!-- Rating ads -->' in line:
            print(f'RATING END: {i+1}')
        if '<!-- Advertiser ads -->' in line:
            print(f'ADV END: {i+1}')
        if '<!-- Engaged ads -->' in line:
            print(f'ENG END: {i+1}')
