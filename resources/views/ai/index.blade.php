@extends('layouts.app')

@section('title', 'AI Zoeken - Opub AI')

@section('content')

    <main class="flex-grow bg-gray-50 h-full">
        <div id="welcome-view" class="h-full flex flex-col justify-center items-center">
            <div class="w-full max-w-3xl mx-auto px-6 text-center">
                <div id="welcome-content">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">
                        Wat wil je weten over Opub AI?
                    </h1>
                    <p class="text-gray-600 mb-8">
                        Krijg direct antwoord op je vraag.
                    </p>

                </div>

                <div id="form-container" class="mt-8">
                    <form id="ai-form" class="relative">
                        <textarea
                                name="q"
                                id="ai-question-input"
                                rows="3"
                                placeholder="Waar kan ik je mee helpen?"
                                class="w-full px-4 py-3 pr-16 text-gray-800 border-2 border-gray-300 bg-white rounded-xl focus:outline-none transition resize-none"
                        ></textarea>
                        <button
                                type="submit"
                                title="Verstuur vraag"
                                class="absolute right-2 bottom-3 flex items-center justify-center h-10 w-10 rounded-lg bg-primary hover:bg-opacity-90 text-white transition-all duration-200"
                        >
                            <i class="fa-solid fa-arrow-up"></i>
                        </button>
                    </form>
                </div>

                <div class="space-y-3 mt-10" id="question-list">
                    <button type="button" data-question="Wat is Opub AI?"
                            class="flex justify-center items-center w-full text-left bg-white border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-100 transition-colors duration-200">
                        <span class="text-gray-700">Wat is Opub AI?</span>
                    </button>
                    <button type="button" data-question="Wat zijn de voordelen van Opub AI?"
                            class="flex justify-center items-center w-full text-left bg-white border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-100 transition-colors duration-200">
                        <span class="text-gray-700">Wat zijn de voordelen van Opub AI?</span>
                    </button>
                    <button type="button" data-question="Wat heb ik nodig om Opub AI op mijn website te zetten?"
                            class="flex justify-center items-center w-full text-left bg-white border border-gray-200 rounded-lg px-4 py-3 hover:bg-gray-100 transition-colors duration-200">
                        <span class="text-gray-700">Wat heb ik nodig om Opub AI op mijn website te zetten?</span>
                    </button>
                </div>
            </div>
        </div>

        <div id="chat-view" class="h-full flex flex-col hidden">
            <div id="chat-history" class="flex-grow p-6 space-y-6 overflow-y-auto max-w-5xl w-full mx-auto">
            </div>

            <div id="chat-form-placeholder" class="flex-shrink-0 bg-gray-50">
                {{-- JS will fill this area with the form --}}
            </div>
        </div>

    </main>

@endsection

@push('styles')

    <style>
        @keyframes blink {
            0%, 80%, 100% {
                opacity: 0;
            }
            40% {
                opacity: 1;
            }
        }

        .dot {
            height: 6px;
            width: 6px;
            background-color: gray;
            border-radius: 50%;
            display: inline-block;
            animation: blink 1.4s infinite both;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>

@endpush()

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const welcomeView = document.getElementById('welcome-view');
            const chatView = document.getElementById('chat-view');
            const chatHistory = document.getElementById('chat-history');
            const formContainer = document.getElementById('form-container');
            const chatFormPlaceholder = document.getElementById('chat-form-placeholder');
            const form = document.getElementById('ai-form');
            const input = document.getElementById('ai-question-input');
            const questionButtons = document.querySelectorAll('#question-list button');

            const answers = {
                "Wat is Opub AI?": "Opub AI is een slimme AI-assistent die direct antwoord geeft op jouw vragen, gebaseerd op geavanceerde taalmodellen.",
                "Wat zijn de voordelen van Opub AI?": "De voordelen van Opub AI zijn snelheid, nauwkeurigheid en het vermogen om 24/7 vragen te beantwoorden.",
                "Wat heb ik nodig om Opub AI op mijn website te zetten?": "Om Opub AI op je website te zetten, heb je enkel een API-sleutel en enkele regels integratiecode nodig."
            };

            let isChatActive = false;

            function handleQuestion(question) {
                if (!isChatActive) {
                    chatFormPlaceholder.appendChild(formContainer);
                    formContainer.className = 'w-full max-w-5xl mx-auto mb-6 px-4 md:px-0 shadow-2xl shadow-[0_-10px_6px_-3px_rgba(255,255,255,0.5)]';
                    welcomeView.classList.add('hidden');
                    chatView.classList.remove('hidden');
                    isChatActive = true;
                }

                appendUserMessage(question);
                const answer = answers[question] || "Sorry, ik heb hier geen antwoord op. Probeer een andere vraag.";
                appendAiResponse(answer);
            }

            const computedStyle = window.getComputedStyle(input);
            const lineHeight = parseFloat(computedStyle.lineHeight);
            const paddingTop = parseFloat(computedStyle.paddingTop);
            const paddingBottom = parseFloat(computedStyle.paddingBottom);
            const maxHeight = (lineHeight * 5) + paddingTop + paddingBottom;

            function adjustTextareaHeight() {
                input.style.height = 'auto';
                const scrollHeight = input.scrollHeight;
                if (scrollHeight > maxHeight) {
                    input.style.height = `${maxHeight}px`;
                    input.style.overflowY = 'auto';
                } else {
                    input.style.height = `${scrollHeight}px`;
                    input.style.overflowY = 'hidden';
                }
            }

            input.addEventListener('input', adjustTextareaHeight);
            adjustTextareaHeight();
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    form.dispatchEvent(new Event('submit', {cancelable: true}));
                }
            });
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const question = input.value.trim();
                if (question) {
                    handleQuestion(question);
                    input.value = '';
                    adjustTextareaHeight();
                }
            });
            questionButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const question = btn.dataset.question;
                    handleQuestion(question);
                });
            });

            function appendUserMessage(question) {
                const messageHtml = `<div class="flex justify-end"><div class="bg-primary text-white p-3 rounded-lg max-w-lg break-words">${question.replace(/\n/g, '<br>')}</div></div>`;
                chatHistory.innerHTML += messageHtml;
                scrollToBottom();
            }

            function appendAiResponse(answer) {
                const responseId = `response-${Date.now()}`;
                const messageHtml = `<div class="flex items-start gap-3"><div class="flex-shrink-0 h-10 w-10 bg-gray-700 rounded-full flex items-center justify-center text-white"><i class="fa-solid fa-robot"></i></div><div class="bg-gray-100 p-3 rounded-lg max-w-lg"><div class="flex items-center gap-1 text-gray-500 text-sm py-2 typing-indicator"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div><div id="${responseId}" class="text-gray-800 hidden break-words"></div></div></div>`;
                chatHistory.innerHTML += messageHtml;
                scrollToBottom();
                const responseContainer = document.getElementById(responseId);
                const typingIndicator = responseContainer.parentElement.querySelector('.typing-indicator');
                setTimeout(() => {
                    typingIndicator.remove();
                    typeText(responseContainer, answer);
                }, 1500);
            }

            function typeText(element, text) {
                let i = 0;
                element.classList.remove('hidden');
                const interval = setInterval(() => {
                    if (i < text.length) {
                        element.textContent += text.charAt(i);
                        i++;
                    } else {
                        clearInterval(interval);
                    }
                }, 20);
            }

            function scrollToBottom() {
                chatHistory.scrollTop = chatHistory.scrollHeight;
            }
        });
    </script>

@endpush