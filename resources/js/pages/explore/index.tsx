import { index } from '@/routes/explore';
import { Head } from '@inertiajs/react';

export default function Explore() {
    return (
        <>
            <Head title="explore" />
            <div className="p-4">
                <p>explore some stuff!!</p>
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
