import { Head } from '@inertiajs/react';
import { index, languages } from '@/routes/explore';
import { Link } from '@inertiajs/react';

export default function Explore() {
    return (
        <>
            <Head title="explore" />
            <div className="flex flex-col gap-6 p-4">
                <Link href={languages()} prefetch>
                    Languages
                </Link>
            </div>
        </>
    );
}

Explore.layout = {
    breadcrumbs: [
        {
            title: 'Explore',
            href: index(),
        },
    ],
};
