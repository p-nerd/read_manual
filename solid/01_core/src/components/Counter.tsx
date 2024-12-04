import { createEffect, createSignal } from "solid-js";

const Counter = () => {
    const [count, setCount] = createSignal<number>(0);

    const increment = () => setCount(prev => prev + 1);

    createEffect(() => {
        console.log(count());
    });

    return (
        <div>
            <span>Count: {count()}</span>{" "}
            <button type="button" onclick={increment}>
                Increment
            </button>
        </div>
    );
};

export default Counter;
