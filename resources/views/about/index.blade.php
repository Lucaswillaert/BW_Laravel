@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- About Us Section -->
                        <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                            <section id="about-us">
                                <h2 class= "text-center"> <strong>About Us </strong></h2>
                                <p class="text-center">Welcome to JournalMe, a unique online platform designed to elevate
                                    your self-expression and reflection. At JournalMe, we believe that words have the power
                                    to inspire, connect, and transform. This isn't just a space for posting quotes; it's a
                                    sanctuary for crafting the narrative of your life through personal journal entries.
                                    Whether you're capturing the essence of your everyday experiences, expressing your
                                    innermost thoughts, or simply chronicling the moments that shape you, JournalMe is your
                                    digital canvas for introspection and creativity. Join our community of wordsmiths and
                                    storytellers, where every entry is a brushstroke in the masterpiece of your life.
                                    Embrace the art of self-discovery with JournalMe, where your words find their home.</p>
                                <p>repo </p>
                            </section>
                        </div>

                        <div class="post-container mx-auto bg-white rounded shadow-md mt-6 px-4 py-4 w-1/2">
                        
                            <div class="container mx-auto px-6 py-8 lg:py-16">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
                                <form action="#" class="space-y-8">
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                                        <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
                                    </div>
                                    <div>
                                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                                        <input type="text" id="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                                        <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                                    </div>
                                    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send message</button>
                                            

                                </form>
                            </div>
                        </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
