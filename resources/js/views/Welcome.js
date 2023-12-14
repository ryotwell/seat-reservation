import React from 'react';
import ReactDOM from 'react-dom';

function Welcome() {
    return (
        <div>
            <div className='flex justify-items-center justify-between px-8 py-4 lg:p-8'>
                <div className='font-extrabold items-center flex'>
                    UNRAM
                </div>
                <div className='flex justify-items-center space-x-4'>
                    <a href='/' className='px-4 py-2'>
                        Home
                    </a>
                    <a href='/login' className='bg-blue-600 text-white px-6 py-2 rounded-full'>
                        Login
                    </a>
                </div>
            </div>

            <div className='px-4 lg:px-20 lg:flex items-center'>
                <div className='w-full lg:w-1/2 mb-10'>
                    <div className='text-3xl text-blue-500 font-extrabold'>
                        The Grate Creative Longue
                    </div>
                    <p className='font-medium mt-2 mb-6 text-slate-900/50 text-sm max-w-lg'>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis in soluta architecto, illo eos labore iusto nobis. Quas, quo sunt.
                    </p>
                    <a className='px-10 py-3 bg-blue-600 rounded-full text-white' href='/login'>Booking</a>
                </div>
                <div className='hidden w-full lg:w-1/2 lg:block'>
                    <div className="flex justify-center ...">
                        <img className="object-fill w-4/5 rounded-xl" src='/img/tgcl3.jpeg' />
                    </div>
                </div>
            </div>

            <div className='lg:flex justify-between py-32 px-4 lg:px-20'>
                <div className='lg:w-1/2 lg:flex items-center mb-6'>
                    <div className='p-4'>
                        <h1 className='text-3xl font-extrabold mb-4'>
                            Apa itu TGCL?
                        </h1>
                        <div>
                            <p className='text-slate-900/60 text-sm mb-4'>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, enim? Repellat sint modi hic aliquam eius cupiditate tempora, maxime dolorum?
                            </p>
                            <p className='text-slate-900/60 text-sm mb-4'>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate aspernatur sit laborum numquam. Illo a eos pariatur iste? Iure, velit!
                            </p>
                            <p className='text-slate-900/60 text-sm'>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus exercitationem, harum omnis consequuntur iure animi magnam velit illo? Itaque, voluptas?
                            </p>
                        </div>
                    </div>
                </div>
                <div className='lg:w-1/2 flex justify-center px-4 lg:px-0'>
                    <img className="object-fill lg:w-2/3 rounded-xl" src='/img/tgcl1.jpeg' />
                </div>
            </div>

            <div className='flex w-full'>
                <div className='bg-gray-900 text-slate-400/70 text-sm py-6 w-full flex justify-center'>
                    <a href=''>Universitas Mataram</a>
                </div>
            </div>
        </div>
    );
}

export default Welcome;

if (document.getElementById('root')) {
    ReactDOM.render(<Welcome />, document.getElementById('root'));
}