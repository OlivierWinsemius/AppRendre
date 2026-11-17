import type { SharedPageProps } from '@inertiajs/core';
import { Head } from '@inertiajs/react';
import {
    index,
    languages as languagesRoute,
    showLanguage,
} from '@/routes/explore';

type Props = SharedPageProps & {
    language: {
        id: number;
        code: string;
    };
};

export default function Language({ language }: Props) {
    return (
        <>
            <Head title="explore" />
            <div className="flex flex-col gap-6 p-4">
                <p>{JSON.stringify(language)}</p>
            </div>
        </>
    );
}

Language.layout = ({ language }: Props) => ({
    breadcrumbs: [
        {
            title: 'Explore',
            href: index(),
        },
        {
            title: 'Languages',
            href: languagesRoute(),
        },
        {
            title: language.code,
            href: showLanguage(language.code),
        },
    ],
});
