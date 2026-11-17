import type { SharedPageProps } from '@inertiajs/core';
import { Head, Link } from '@inertiajs/react';
import {
    index,
    languages as languagesRoute,
    showLanguage,
} from '@/routes/explore';

type Props = SharedPageProps & {
    languages: string[];
};

export default function Languages({ languages }: Props) {
    return (
        <>
            <Head title="explore" />
            <div className="flex flex-col gap-6 p-4">
                <h1>Languages:</h1>

                <ul>
                    {languages.map((lang) => (
                        <li key={lang}>
                            <Link href={showLanguage(lang)} prefetch>
                                {lang}
                            </Link>
                        </li>
                    ))}
                </ul>
            </div>
        </>
    );
}

Languages.layout = {
    breadcrumbs: [
        {
            title: 'Explore',
            href: index(),
        },
        {
            title: 'Languages',
            href: languagesRoute(),
        },
    ],
};
