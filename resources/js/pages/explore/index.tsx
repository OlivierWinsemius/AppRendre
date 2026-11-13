import type { SharedPageProps } from '@inertiajs/core';
import { Head } from '@inertiajs/react';
import { index } from '@/routes/explore';

type Props = SharedPageProps & {
    languages: string[];
};

export default function Explore({ languages }: Props) {
    return (
        <>
            <Head title="explore" />
            <div className="flex flex-col gap-6 p-4">
                <h1>Languages:</h1>

                <ul>
                    {languages.map((lang) => (
                        <li key={lang}>{lang}</li>
                    ))}
                </ul>
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
